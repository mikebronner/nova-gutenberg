Nova.booting((Vue, router, store) => {
    Vue.component('index-nova-gutenberg', require('./components/IndexField'))
    Vue.component('detail-nova-gutenberg', require('./components/DetailField'))
    Vue.component('form-nova-gutenberg', require('./components/FormField'))
})
