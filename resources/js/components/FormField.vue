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

    mounted: function () {
        Laraberg.init(this.field.name);
    },

    methods: {
        /*
         * Set the initial, internal value for the field.
         */
        setInitialValue() {
            this.value = this.field.value || '';
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
            formData.append(this.field.attribute, Laraberg.getContent())
        },

        handleChange(value) {
            this.value = value
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
