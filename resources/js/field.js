import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('detail-nova-json-field', DetailField)
  app.component('form-nova-json-field', FormField)
})
