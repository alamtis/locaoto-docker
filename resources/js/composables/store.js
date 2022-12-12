import { ref } from "vue";
import axios from "axios";

export default function useStore(url, options) {
  const data = ref(null);
  axios
    .post(url, options)
    .then((response) => {
      data.value = response.data;
    })
    .catch((error) => {
      console.log(error);
    });
  return { data };
}
