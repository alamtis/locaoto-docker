export function useFormData(obj) {
  const formData = new FormData();
  for (let key in obj.value) {
    formData.append(key, obj.value[key]);
  }
  return formData;
}
