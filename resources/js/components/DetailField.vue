<script>
export default {
    props: [
        'resource',
        'resourceName',
        'resourceId',
        'field'
    ],
};
</script>

<template>
    <panel-item :field="field">
        <template slot="value">
            <excerpt
                :content="field.value"
                :should-show="field.shouldShow"
            ></excerpt>
        </template>
    </panel-item>
</template>
