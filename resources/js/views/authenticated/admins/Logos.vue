<script setup>
import { ref, defineProps } from "vue";
</script>

<template>
    <Authenticated>
        <FileUpload
            name="logos[]"
            @uploader="onUpload"
            :customUpload="true"
            accept="image/*"
            :maxFileSize="1000000"
            invalidFileSizeMessage="La taille de l'image doit être inférieure à 1 Mo"
            chooseLabel="Choisir"
            uploadLabel="Télécharger"
            cancelLabel="Annuler"
            :multiple="true"
        >
            <template #empty>
                <p>Glissez-déposez les fichiers ici pour les télécharger.</p>
            </template>
        </FileUpload>
        <div
            class="grid md:grid-cols-5 grid-cols-2 gap-5 place-items-center bg-white rounded-xl p-8 mt-8"
        >
            <!-- <div
                class="w-full h-60 border rounded-xl p-4 relative"
                v-for="logo in this.$page.props.partners"
            >
                <Image
                    :src="`/img/logos/displayed/${logo.path}`"
                    alt=""
                    imageClass="w-full h-full"
                />
                <span class="absolute top-5 right-5">
                    <Button
                        icon="pi pi-times"
                        class="p-button-danger p-button-sm w-full mt-2 text-center"
                        @click="deleteLogo(logo.id)"
                    />
                </span>
            </div> -->
        </div>
    </Authenticated>
</template>

<style scoped></style>
