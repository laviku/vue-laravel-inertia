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
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mb-3" v-if="articles.length">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th v-for="header in headers" :key="header" class="px-6 py-3">
                                        {{ header }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="post in articles" :key="post.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">{{ post.title }}</td>
                                    <td class="px-6 py-4">{{ post.body }}</td>
                                    <td class="px-6 py-4">
                                        <button @click="deleteArticle(post.id)" class="p-1 bg-red-600 text-white rounded-sm hover:bg-red-800">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <NavLink :href="route('articles.create')" :active="route().current('articles')">
                            New Article
                        </NavLink>
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>

<script setup>
import NavLink from '@/Components/NavLink.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineProps({
    articles: {
        type: Array,
        default: () => [],
    },
});

const headers = ["articles", "body", "actions"];

const form = useForm({});

const deleteArticle = (id) => {
    form.delete(`articles/${id}`);
}
</script>