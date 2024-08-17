<template>
    <Head title="Articles" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <table v-if="articles.length">
                            <thead>
                                <tr>
                                    <th v-for="header in headers" :key="header">
                                        {{ header }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="post in articles" :key="post.id">
                                    <td>{{ post.title }}</td>
                                    <td>{{ post.body }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <hr/>
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>

<script setup>
import NavLink from '@/Components/NavLink.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    articles: {
        type: Array,
        default: () => [],
    },
});

const headers = ["articles", "body"];
</script>