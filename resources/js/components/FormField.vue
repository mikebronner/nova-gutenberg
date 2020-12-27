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

  updated: function () {
    window.Laraberg = Object.assign({}, this.blankLaraberg);
    this.initializeEditor();
  },

  methods: {
    initializeEditor: function () {
      let editor = document.getElementById("laraberg__editor");
      this.removeEditor();

      if (editor !== null) {
        editor.remove();
      }

      Laraberg.init(this.field.name, {
        laravelFilemanager: true,
      });
    },
    removeEditor: function () {
      // Don't wanna break everything just because something goes wrong here
      try {
        const blocks = window.wp.data.select('core/blocks').getBlockTypes().map(bt => bt.name);
        const {removeBlockTypes} = window.wp.data.dispatch('core/blocks');
        const {__experimentalTearDownEditor} = window.wp.data.dispatch('core/editor');

        removeBlockTypes(blocks);
        __experimentalTearDownEditor();

        if (((window.Laraberg || {}).editor || false) !== false) {
          window.wp.element.unmountComponentAtNode(window.Laraberg.editor);
        }
      } catch (e) {}
    },
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
                :id="field.name"
                :name="field.name"
                :placeholder="field.name"
                :value="value"
            ></textarea>
    </template>
  </default-field>
</template>
