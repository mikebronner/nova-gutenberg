import DetailField from './components/DetailField';
import FormField from './components/FormField';
import IndexField from './components/IndexField';

Nova.booting(function (app, store) {
    app.component('index-nova-gutenberg', IndexField);
    app.component('detail-nova-gutenberg', DetailField);
    app.component('form-nova-gutenberg', FormField);
});
