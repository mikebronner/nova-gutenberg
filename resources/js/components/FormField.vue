<script>
    import {FormField, HandlesValidationErrors} from 'laravel-nova';

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

        data: function () {
            return {
                blankLaraberg: {},
            };
        },

        beforeUpdate: function () {
            this.removeEditor();
        },

        mounted: function () {
            this.blankLaraberg = Object.assign({}, window.Laraberg);
            this.initializeEditor();
        },

        beforeDestroy: function () {
            try {
                const blocks = window.wp
                    .data
                    .select('core/blocks')
                    .getBlockTypes()
                    .map(function (bt) {
                        return bt.name;
                    });
                const {removeBlockTypes} = window.wp
                    .data
                    .dispatch('core/blocks');
                const {__experimentalTearDownEditor, resetBlocks} = window.wp
                    .data
                    .dispatch('core/editor');

                removeBlockTypes(blocks);
                __experimentalTearDownEditor();
                resetBlocks(parse(this.value));
            } catch (exception) {}

            if (((window.Laraberg || {}).editor || false) !== false) {
                window.wp.element.unmountComponentAtNode(window.Laraberg.editor);
            }

            window.Laraberg.editor = undefined;
        },

        updated: function () {
            window.Laraberg = Object.assign({}, this.blankLaraberg);
            this.initializeEditor();

            if (this.value !== "") {
                Laraberg.setContent(this.value);
            }
        },

        methods: {
            initializeEditor: function () {
                let editor = document.getElementById("laraberg__editor");

                if (editor !== null) {
                    this.removeEditor();
                    editor.remove();
                }

                Laraberg.init(this.field.name, {
                    laravelFilemanager: true,
                });

                const {toggleFeature} = window.wp.data.dispatch('core/edit-post');
                const {isFeatureActive} = wp.data.select('core/edit-post');

                this.field.disable_welcome
                    && isFeatureActive("welcomeGuide")
                    && toggleFeature('welcomeGuide');
            },

            removeEditor: function () {
                try {
                    const blocks = window.wp
                        .data
                        .select('core/blocks')
                        .getBlockTypes()
                        .map(function (bt) {
                            return bt.name;
                        });
                    const {removeBlockTypes} = window.wp
                        .data
                        .dispatch('core/blocks');
                    const {__experimentalTearDownEditor, resetBlocks} = window.wp
                        .data
                        .dispatch('core/editor');

                    removeBlockTypes(blocks);
                    __experimentalTearDownEditor();
                    resetBlocks(parse(this.value));
                } catch (e) {}

                if (((window.Laraberg || {}).editor || false) !== false) {
                    window.wp
                        .element
                        .unmountComponentAtNode(window.Laraberg.editor);
                }

                window.Laraberg.editor = undefined;
            },

            setInitialValue: function () {
                this.value = this.field.value || "";
            },

            fill: function (formData) {
                formData.append(this.field.attribute, Laraberg.getContent());
                sessionStorage.removeItem("wp-autosave-block-editor-post-1");
            },

            handleChange: function (value) {
                this.value = value;
            },
        },
    };
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
                :id="field.name"
                :name="field.name"
                :placeholder="field.name"
                :value="value"
            ></textarea>
        </template>
    </default-field>
</template>
