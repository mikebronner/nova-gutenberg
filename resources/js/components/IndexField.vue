<template>
    <excerpt
        :content="field.value"
        :should-show="field.shouldShow"
    ></excerpt>
</template>

<script>
export default {
    props: ['resourceName', 'field'],
}
</script>
