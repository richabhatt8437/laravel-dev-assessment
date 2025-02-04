<script setup lang="ts">
import { ref, defineEmits } from 'vue';
import { router } from '@inertiajs/vue3';

// Define emit event
const search = ref('');
const location = ref('');

const searchJobs = () => {
    router.get('/dashboard', { search: search.value, location: location.value }, { preserveState: true });
};
</script>

<template>
    <div class="relative bg-slate-100">
        <div class="container relative flex flex-col gap-8 py-32 text-center">
            <div class="space-y-4">
                <h1 class="text-3xl font-bold lg:text-6xl">
                    Find your dream job
                </h1>
                <p class="text-sm lg:text-base text-slate-600">
                    Looking for jobs? Browse our latest job openings to view &
                    apply to the best jobs today!
                </p>
            </div>
            <!-- Search -->
            <div>
                <div
                    class="flex items-center justify-center w-full max-w-3xl mx-auto overflow-hidden bg-white border border-gray-200 rounded-full"
                >
                    <div class="flex items-center flex-1 border-r">
                        <span class="pl-5">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                                />
                            </svg>
                        </span>
                        <input
                            v-model="search"
                            placeholder="Job title or keyword"
                            class="py-4 border-none shadow-none outline-none focus:outline-none focus:ring-0 ring-0"
                            type="text"
                        />
                    </div>
                    <div class="flex items-center flex-1">
                        <span class="pl-5">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"
                                />
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"
                                />
                            </svg>
                        </span>
                        <input
                            v-model="location"
                            placeholder="Location"
                            class="py-4 border-none shadow-none outline-none focus:outline-none focus:ring-0 ring-0"
                            type="text"
                        />
                    </div>
                    <button @click="searchJobs" class="px-6 py-2 mr-3 text-sm font-medium text-white rounded-full bg-brand">
                        Find jobs
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
