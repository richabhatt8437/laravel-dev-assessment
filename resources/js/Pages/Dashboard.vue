<script setup lang="ts">
import Hero from '@/Components/Dashboard/Hero.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { defineProps, PropType, onMounted, computed, ref } from 'vue';

interface Job {
    id: number;
    title: string;
    company_name: string;
    location: string;
    experience: string;
    salary_range: string;
    tags: string[];
    description: string;
    technologies: string[];
}

const props = defineProps({
    jobs: Array as PropType<Job[]>
});

const searchTitle = ref('');
const searchLocation = ref('');

const updateSearch = (search: { title: string; location: string }) => {
    searchTitle.value = search.title;
    searchLocation.value = search.location;
};

const filteredJobs = computed(() => {
    return props.jobs?.filter(job => {
        const titleMatch = searchTitle.value
            ? job.title.toLowerCase().includes(searchTitle.value.toLowerCase())
            : true;
        const locationMatch = searchLocation.value
            ? job.location.toLowerCase().includes(searchLocation.value.toLowerCase())
            : true;
        return titleMatch && locationMatch;
    }) ?? [];
});
onMounted(() => {
    console.log("Jobs received from Laravel:", props.jobs);
});
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <!-- Hero -->
        <Hero />

        <!-- Job List -->
        <div class="bg-white">
            <div class="container py-5">
                <!-- TODO: Add job list here -->
                <h2 class="mb-4 text-xl font-bold">Job Listings</h2>
                <ul v-if="filteredJobs.length">
                    <li v-for="job in filteredJobs" :key="job.id" class="p-4 mb-4 border rounded">
                        <div class="flex items-center gap-4">
                            <img src="/logo.svg" alt="Company Logo" class="w-12 h-12 rounded-full">
                            <div>
                                <h3 class="text-lg font-semibold">{{ job.title }}</h3>
                                <p class="text-gray-600">{{ job.company_name }} - {{ job.location }}</p>
                                <p class="text-gray-500">{{ job.experience }} | {{ job.salary_range }}</p>
                            </div>
                        </div>
                        <p class="mt-2 text-sm text-gray-700">{{ job.description }}</p>
                        <div class="flex flex-wrap gap-2 mt-2">
                            <span v-for="tag in job.tags" :key="tag" class="px-2 py-1 text-xs bg-blue-200 rounded">
                                {{ tag }}
                            </span>
                        </div>
                        <div class="flex flex-wrap gap-2 mt-2">
                            <span v-for="technology in job.technologies" :key="technology" class="px-2 py-1 text-xs bg-indigo-200 rounded">
                                {{ technology.name }}
                            </span>
                        </div>
                    </li>
                </ul>
                <p v-else class="text-gray-500">No jobs found.</p>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
