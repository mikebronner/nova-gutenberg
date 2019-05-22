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
                :id="field.name"
                v-model="value"
                class="hidden"
                :class="errorClasses"
                :placeholder="field.name"
            ></textarea>
        </template>
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

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
            formData.append(this.field.attribute, this.value || '')
        },

        /**
         * Update the field's internal value.
         */
        handleChange(value) {
            this.value = value
        },
    },
}
</script>
