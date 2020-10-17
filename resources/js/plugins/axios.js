import axios from "axios";

console.log('file env', process.env)
const axiosInstance = axios.create({

  headers:{
    baseURL: '',
    Accept: 'application/json',
    'Content-Type': 'application/json',
  }
});

export default axiosInstance;
