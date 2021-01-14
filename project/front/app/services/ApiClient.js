import axios from 'axios';
import config from '../config/config';

export default {
    get: function(path) {
      if(!path) {
        console.error('erreur: le path n\'est pas renseigné');
      } else {
        return axios.get(config.baseUrl + path);
      }   
    },
    
    post: function(path, data) {
      if(!path || !data) {
        console.error('erreur : le path et/ou les data ne sont pas renseignés');
      } else {
        return axios.post(
          config.baseUrl + path, 
          data,
        );
      }
    }
}