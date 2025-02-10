<script setup>
import { ref, onMounted } from 'vue'

defineProps({
    post: {
        type: Object,
        required: true
    }
})

</script>
<template>
    <div class="col12" :data-id="post.post_id">
        <p>Testing Project Listing</p>
    </div>
</template>