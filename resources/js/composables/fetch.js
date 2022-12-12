import { ref } from "vue";
import axios from "axios";

export default function useFetch(url, options) {
  const data = ref(null);
  axios
    .get(url, options)
    .then((response) => {
      data.value = response.data;
    })
    .catch((error) => {
      console.log(error);
    });
  return { data };
}
