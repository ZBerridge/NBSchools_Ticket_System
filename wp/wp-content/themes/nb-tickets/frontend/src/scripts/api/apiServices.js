import Axios from 'axios'


export default {
    getProjects(count = 4, skip = 0, full_count = false) {
        return Axios.get('projects/?count=' + count + '&skip=' + skip + '&full_count=' + full_count).then(response => {
            return response.data
        })
    }
}