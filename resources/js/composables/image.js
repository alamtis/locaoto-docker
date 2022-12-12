import { ref, watch } from "vue";

export default function useImage() {
  const imageFile = ref("");
  const imageUrl = ref("");

  const handleSelectedImage = (e) => {
    if (e.target.files.length === 0) {
      imageFile.value = null;
      imageUrl.value = "";
      return;
    }

    imageFile.value = e.target.files[0];
  };

  watch(imageFile, (imageFile) => {
    if (!(imageFile instanceof File)) {
      imageFile.value = null;
      imageUrl.value = "";
      return;
    }
    const fileReader = new FileReader();

    fileReader.readAsDataURL(imageFile);

    fileReader.addEventListener("load", () => {
      imageUrl.value = fileReader.result;
    });
  });

  return { imageFile, imageUrl, handleSelectedImage };
}
