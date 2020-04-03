import axios from "axios";

// let axiosInstance = axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const axiosInstance = axios.create({
  headers:{
    Accept: 'application/json',
    'Content-Type': 'application/json'
  }
});

export default axiosInstance;
