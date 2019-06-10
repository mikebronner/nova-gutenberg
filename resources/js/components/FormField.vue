<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
    mixins: [
        FormField,
        HandlesValidationErrors,
    ],

    props: [
        'field',
        'resourceId',
        'resourceName',
    ],

    created: function () {
        if (window.Laraberg.editor != null) {
            window.location.reload();
            // window.Laraberg.editor = null;
            // window.wp = null;
        }
    },

    mounted: function () {
        Laraberg.init(this.field.name, {
            laravelFilemanager: {
                prefix: `/${window.Nova.config.lfm.url_prefix}`
            },
        });
    },

    methods: {
        setInitialValue: function () {
            this.value = this.field.value || '';
        },

        fill: function (formData) {
            formData.append(this.field.attribute, Laraberg.getContent());
        },

        handleChange: function (value) {
            this.value = value;
        },
    },
}
</script>

<template>
    <default-field
        :field="field"
        :errors="errors"
        :fullWidthContent="true"
    >
        <template
            slot="field"
        >
            <textarea
                ref="content"
                :value="value"
                :name="field.name"
                :id="field.name"
                :placeholder="field.name"
            ></textarea>
        </template>
    </default-field>
</template>
