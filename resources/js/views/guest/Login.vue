<script setup>
import { reactive } from "vue";

const form = reactive({
    email: "",
    password: "",
});
const login = async () => {
    const { data } = await axios.post("/api/login", {
        email: form.email,
        password: form.password,
    });
    console.log(data);
};
</script>

<template>
    <div class="flex min-h-screen items-center justify-center bg-gray-100">
        <div>
            <div class="mt-4 bg-white px-12 py-8 text-left shadow-lg">
                <div class="flex justify-center">
                    <img
                        src="assets/images/images/logo1.png"
                        alt="Workflow"
                        class="h-14 w-40"
                    />
                </div>
                <form action="">
                    <div class="mt-4 w-full">
                        <div>
                            <label
                                class="block text-sm font-bold text-gray-700"
                                for="email"
                            >
                                Email
                            </label>
                            <input
                                type="text"
                                placeholder="Email"
                                class="mt-2 w-full rounded-md border px-4 py-2 focus:outline-none focus:ring-1 focus:ring-blue-600"
                            />
                        </div>
                        <div class="mt-4">
                            <label
                                class="block text-sm font-bold text-gray-700"
                            >
                                Password
                            </label>
                            <input
                                type="password"
                                placeholder="Password"
                                class="mt-2 w-full rounded-md border px-4 py-2 focus:outline-none focus:ring-1 focus:ring-blue-600"
                            />
                        </div>
                        <div class="flex items-baseline justify-between">
                            <button
                                class="mt-4 rounded-lg bg-blue-600 px-6 py-2 text-white hover:bg-blue-900"
                            >
                                Login
                            </button>
                            <a
                                href="#"
                                class="text-sm text-blue-600 hover:underline"
                            >
                                Forgot password?
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <p class="mt-4 text-center text-xs text-gray-500">
                &copy;2022 LOCAOTO. All rights reserved.
            </p>
        </div>
    </div>
</template>
