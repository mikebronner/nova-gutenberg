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

    mounted() {
        Laraberg.editor = null;

        wp.blocks.getBlockTypes().forEach(block => {
            wp.blocks.unregisterBlockType(block.name)
        });

        Laraberg.init(this.field.name, {
            laravelFilemanager: {
                prefix: `/${window.Nova.config.lfm.url_prefix}`
            },
        });
        
        let blocks = wp.blocks.rawHandler({ HTML: this.value });
        wp.data.dispatch('core/editor').resetBlocks(blocks);

        // This prevents the page from warning over unsaved changes... and the
        // timeout prevents an error...
        setTimeout(function () {
            wp.data.dispatch('core/editor').savePost();
        }, 250);
    },

    methods: {
        setInitialValue: function () {
            this.value = this.field.value || '';
        },

        fill: function (formData) {
            formData.append(this.field.attribute, Laraberg.getContent());
            wp.data.dispatch('core/editor').resetBlocks([]);
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
