<script setup>
import ApiCalls from '../../api/apiServices'
import ProjectListingItem from '../components/ProjectListingItem.vue'
import { ref, onMounted } from 'vue'
let posts = ref(null)

//console.log('mounted...')

onMounted(() => {
    ApiCalls.getProjects(10, 0)
        .then(data => {
            posts.value = data
        }).catch(error => console.log(error))
})
</script>
<template>
    <div class="container">
        <div class="row">
            <ProjectListingItem v-for="post in posts" :key="post.id" :post="post"></ProjectListingItem>
        </div>
    </div>
</template>