// Vendor scripts
import * as materialize from 'materialize-css'
import { createApp } from 'vue'

// Vendor actions
M.AutoInit();

// Custom scripts
import './custom/formHandling'

import Axios from 'axios';
Axios.defaults.baseURL = 'http://' + window.location.hostname +'/wp-json/nbps/v1/';Axios.defaults.headers.post['Content-Type'] = 'application/json';
Axios.defaults.headers.post['Content-Type'] = 'application/json';

import ProjectListing from './vue/views/ProjectListingView.vue';
const ProjectListingPage = createApp(ProjectListing);
ProjectListingPage.mount('#vue-project-listing');