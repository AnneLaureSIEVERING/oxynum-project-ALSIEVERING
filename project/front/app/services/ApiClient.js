import axios from 'axios';

const baseUrl = process.env.BASE_URL

export default {
    get: function(path) {
        return axios.get(baseUrl + path);
    },
    
    post: function(path, data) {

      return axios.post(
        baseUrl + path, 
        data,
      );
    }
}