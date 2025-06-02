<script setup>
import ApiCalls from '../../api/apiServices'
import ProjectListingItem from '../components/ProjectListingItem.vue'
import { ref, onMounted } from 'vue'
let posts = ref(null)
let currentPage = 0
let postCount = 0

function getPostCount(){
    ApiCalls.getProjects(-1, 0, true)
        .then(data => {
            postCount = data
        }).catch(
            error => console.log(error)
    )
}

function retrievePosts(count, skip) {
        ApiCalls.getProjects(count, skip)
        .then(data => {
            posts.value = data
        }).catch(
            error => console.log(error)
    )
}

function prevPage(){
    let skip = 0
    if(currentPage > 0){
        currentPage--
        retrievePosts(4, currentPage * 4)
    }

    return
}

function nextPage(){
    if((currentPage + 1) * 4 < postCount) {
        currentPage++
        retrievePosts(4, currentPage * 4)
    }
    return
}

onMounted(() => {
    getPostCount()
    retrievePosts(4, 0)
})
</script>
<template>
    <ProjectListingItem v-for="post in posts" :key="post.post_id" :post="post"></ProjectListingItem>
    <div class="row col s12">
        <button @click="prevPage" class="btn-large left">Prev</button>
        <button @click="nextPage" class="btn-large right">Next</button>
    </div>
</template>