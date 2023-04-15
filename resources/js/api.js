import axios from 'axios';
const api = axios.create({
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
    }
});

api.defaults.timeout = 20000;

api.interceptors.response.use(
    response => {
        if (response.status === 200 || response.status === 201) {
            return Promise.resolve(response);
        } else {
            return Promise.reject(response);
        }
    },
    error => {
        if(!error.response){
            console.log("The error doesn't contain a response")
            console.log(error)
            return
        }
        if (error.response.status) {

            if (error.response.status === 401) {
                window.location.href = '/logout';
            }

            return Promise.reject(error.response);
        }
    }
);

export default api;
