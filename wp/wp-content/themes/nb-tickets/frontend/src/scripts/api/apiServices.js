import Axios from 'axios'


export default {
    getProjects(count, skip) {
        return Axios.get('projects/?count=' + count + '&skip=' + skip).then(response => {
            return response.data
        })
    }
}