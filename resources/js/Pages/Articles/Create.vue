<template>
    <Head title="Create new Article" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create New Article</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="submit">
                            <label for="title">Title</label>
                            <input type="text" id="title" v-model="form.title" />
                            <label for="body">Body</label>
                            <input type="text" id="body" v-model="form.body" />
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
    import { Head, useForm } from '@inertiajs/vue3';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { onMounted } from 'vue';

    const props = defineProps({
        article: {
            type: Object, 
            default: null,
        }, 
        isUpdating: {
            type: Boolean,
            default: false,
        },
    })

    const form = useForm({
        title: "",
        body: "",
    });

    const submit = () => (props.isUpdating ? updatePost() : createPost());
    const createPost = () => form.post("/articles");
    const updatePost = () => form.put(`/articles/${ props.article.id }`);

    onMounted(() => {
        if(props.isUpdating) {
            form.title = props.article.title;
            form.body = props.article.body;
        }
    })
</script>