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
    <div class="col s12 l6" :data-id="post.post_id">
      <div class="card white listing-card">
        <div class="card-body black-text">
          <div class="card-title-wrap">
            <div class="row">
              <div class="col s12 l4">{{ post.title }}</div>
              <div class="col s12 l4">Start Date: {{ post.start_date }}</div>
              <div class="col s12 l4">Due Date: {{ post.due_date }}</div>
            </div>
          </div>
          <p class="card-text">{{ post.description }}</p>
        </div>
        <div class="card-action">
          <a class="waves-effect waves-light btn-large" :href="post.permalink"><i class="material-icons right">construction</i>Project Link</a>
        </div>
      </div>
    </div>
</template>