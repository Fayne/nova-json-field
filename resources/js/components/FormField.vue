<template>
  <DefaultField
      :field="currentField"
      :errors="errors"
      :full-width-content="fullWidthContent"
      :show-help-text="showHelpText"
  >
    <template #field>
      <textarea
          ref="theTextarea"
          :id="currentField.uniqueKey"
          class="w-full h-auto py-3 form-control form-input form-control-bordered"
      />
    </template>
  </DefaultField>
</template>

<script>
import CodeMirror from 'codemirror';
import 'codemirror/mode/javascript/javascript';
import { DependentFormField, HandlesValidationErrors } from '@/mixins';

export default {
  mixins: [HandlesValidationErrors, DependentFormField],

  codemirror: null,

  data() {
    return {
      isValidJson: true,
    }
  },

  /**
   * Mount the component.
   */
  mounted() {
    this.setInitialValue()

    if (this.isVisible) {
      this.handleShowingComponent()
    }
  },

  watch: {
    currentlyIsVisible(current, previous) {
      if (current === true && previous === false) {
        this.$nextTick(() => this.handleShowingComponent())
      } else if (current === false && previous === true) {
        this.handleHidingComponent()
      }
    },
  },

  methods: {
    handleShowingComponent() {
      const config = {
        mode: 'application/json',
        tabSize: 4,
        indentWithTabs: true,
        lineWrapping: true,
        lineNumbers: true,
        theme: 'dracula',
        autoRefresh: true,
        ...{ readOnly: this.currentlyIsReadonly },
        ...this.currentField.options,
      }

      this.codemirror = CodeMirror.fromTextArea(this.$refs.theTextarea, config)
      const initialValue = this.value ?? this.currentField.value
      this.codemirror.getDoc().setValue(initialValue)
      this.codemirror.setSize('100%', this.currentField.height)
      
      // 验证初始值
      this.validateJson(initialValue)
      this.codemirror.getDoc().on('change', (cm, changeObj) => {
        this.value = cm.getValue()
        this.validateJson(this.value)

        if (this.field) {
          this.emitFieldValueChange(this.fieldAttribute, this.value)
        }
      })
    },

    handleHidingComponent() {
      this.codemirror = null
    },

    onSyncedField() {
      if (this.codemirror) {
        const value = this.currentField.value
        this.codemirror.getDoc().setValue(value)
        this.validateJson(value)
      }
    },

    validateJson(value) {
      if (!value || value.trim() === '') {
        this.isValidJson = true
        this.updateEditorStyle()
        return
      }

      try {
        JSON.parse(value)
        this.isValidJson = true
      } catch (e) {
        this.isValidJson = false
      }
      
      this.updateEditorStyle()
    },

    updateEditorStyle() {
      if (this.codemirror) {
        const wrapper = this.codemirror.getWrapperElement()
        if (this.isValidJson) {
          wrapper.style.border = ''
          wrapper.style.boxShadow = ''
        } else {
          wrapper.style.border = '2px solid #ef4444'
          wrapper.style.boxShadow = '0 0 0 3px rgba(239, 68, 68, 0.1)'
        }
      }
    },
  },
}
</script>
