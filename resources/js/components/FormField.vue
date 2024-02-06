
<template>
    <DefaultField :field="field" :errors="errors" :full-width-content="fullWidthContent" class="prose max-w-none">
        <template #field>
            <input class="prose" :id="field.name" :name="field.name" :placeholder="field.name"
                @change="handleChange($event.target.value)" :value="field.value" />

            <!-- <input :id="field.attribute" type="text" class="w-full form-control form-input form-input-bordered"
                :class="errorClasses" :placeholder="field.name" v-model="value" /> -->
        </template>
    </DefaultField>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova';

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
        console.log(JSON.stringify(this.field, null, 3))
        this.blankLaraberg = Object.assign({}, window.Laraberg);
        this.initializeEditor();
    },

    beforeDestroy: function () {
        try {
            const blocks = window.Laraberg.wordpress
                .data
                .select('core/blocks')
                .getBlockTypes()
                .map(function (bt) {
                    return bt.name;
                });
            const { removeBlockTypes } = window.Laraberg.wordpress
                .data
                .dispatch('core/blocks');
            const { __experimentalTearDownEditor, resetBlocks } = window.Laraberg.wordpress
                .data
                .dispatch('core/editor');

            removeBlockTypes(blocks);
            __experimentalTearDownEditor();
            resetBlocks(parse(this.value));
        } catch (exception) { }

        if (((window.Laraberg || {}).editor || false) !== false) {
            window.Laraberg.wordpress.element.unmountComponentAtNode(window.Laraberg.editor);
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

            let textarea = document.getElementById(this.field.name);
            // textarea.value = this.value;
            // console.log('seeding', this.value)

            if (editor !== null) {
                this.removeEditor();
                editor.remove();
            }

            console.log('lra', window.Laraberg);
            window.Laraberg.init(textarea, {
                laravelFilemanager: true,
            });

            var wp = window.Laraberg.wordpress;


            // const { toggleFeature } = window.Laraberg.wordpress.data.dispatch('core/edit-post');

            // const { isFeatureActive } = window.Laraberg.wordpress.data.select('core/edit-post');

            // this.field.disable_welcome
            //     && isFeatureActive("welcomeGuide")
            //     && toggleFeature('welcomeGuide');
        },

        removeEditor: function () {
            try {
                const blocks = window.Laraberg.wordpress
                    .data
                    .select('core/blocks')
                    .getBlockTypes()
                    .map(function (bt) {
                        return bt.name;
                    });
                const { removeBlockTypes } = window.Laraberg.wordpress
                    .data
                    .dispatch('core/blocks');
                const { __experimentalTearDownEditor, resetBlocks } = window.Laraberg.wordpress
                    .data
                    .dispatch('core/editor');

                removeBlockTypes(blocks);
                __experimentalTearDownEditor();
                resetBlocks(parse(this.value));
            } catch (e) { }

            if (((window.Laraberg || {}).editor || false) !== false) {
                window.Laraberg.wordpress
                    .element
                    .unmountComponentAtNode(window.Laraberg.editor);
            }

            window.Laraberg.editor = undefined;
        },

        setInitialValue: function () {
            this.value = this.field.value || "";
        },

        fill: function (formData) {
            formData.append(this.field.attribute, this.value);
            console.log('fill formData', this.field.attribute, formData, this.value)
            sessionStorage.removeItem("wp-autosave-block-editor-post-1");
        },

        handleChange: function (value) {
            this.value = value
            console.log('new value', this.value)
        },
    },
};
</script>
