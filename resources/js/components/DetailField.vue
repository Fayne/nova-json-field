<template>
  <PanelItem :index="index" :field="field">
    <template #value>
      <div
          v-if="fieldValue"
          class="px-0 overflow-hidden"
      >
        <textarea ref="theTextarea" />
      </div>
      <p v-else>&mdash;</p>
    </template>
  </PanelItem>
</template>

<script>
import CodeMirror from 'codemirror'
import { FieldValue } from '@/mixins'

export default {
  mixins: [FieldValue],

  props: ['index', 'resource', 'resourceName', 'resourceId', 'field'],

  codemirror: null,

  /**
   * Mount the component.
   */
  mounted() {
    const fieldValue = this.fieldValue

    if (fieldValue !== null) {
      const config = {
        mode: 'application/json',
        lineWrapping: true,
        lineNumbers: false,
        theme: 'default',
        ...this.field.options,
        readOnly: true,
        tabindex: '-1', // The editor is for display only and should not be tabbable.
        cursorBlinkRate: -1, // 禁用光标闪烁
      }

      this.codemirror = CodeMirror.fromTextArea(this.$refs.theTextarea, config)
      
      // 压缩JSON为最精简格式
      let compactValue = fieldValue
      try {
        const parsed = JSON.parse(fieldValue)
        compactValue = JSON.stringify(parsed)
      } catch (e) {
        // 如果不是有效JSON，保持原值
        compactValue = fieldValue
      }
      
      this.codemirror?.getDoc().setValue(compactValue)
      
      // 根据内容自动调整高度
      this.$nextTick(() => {
        const lineCount = this.codemirror.lineCount()
        const lineHeight = this.codemirror.defaultTextHeight()
        const padding = 10 // 上下内边距
        const autoHeight = Math.max(lineCount * lineHeight + padding, 30) // 最小高度30px
        this.codemirror?.setSize('100%', autoHeight + 'px')
      })
    }
  },
}
</script>
