<template>
    <AppLayout title="Dashboard">
        <div
            class="bg-white rounded-lg shadow-lg p-6 w-full max-w-2xl mx-auto mt-10"
        >
            <h1 class="text-2xl font-semibold mb-4 border-b pb-2">
                Lista de Categorias
            </h1>
            <div class="mt-4 space-y-4">
                <div
                    v-for="categoria in categorias"
                    :key="categoria.id"
                    class="p-3 bg-gray-100 rounded hover:bg-gray-200 transition ease-in-out duration-150 flex justify-between items-center"
                >
                    <div>
                        <div class="font-bold">{{ categoria.name }}</div>
                        <div class="text-sm text-gray-600">
                            {{ categoria.description }}
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <!-- Show Button -->
                        <inertia-link
                            :href="`/categorias/${categoria.id}`"
                            class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600"
                        >
                            Show
                        </inertia-link>

                        <!-- Delete Button (Add confirmation before actual deletion for better UX) -->
                        <button
                            @click="deleteProduct(categoria.id)"
                            class="bg-red-500 text-white p-2 rounded hover:bg-red-600"
                        >
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { usePage, router } from "@inertiajs/vue3";

const props = defineProps({
    categorias: [],
});

const deleteProduct = (productId) => {
    if (confirm("Seguro/a que quieres eliminar este registro?")) {
        router.delete(`/categorias/${productId}`);
    }
};
</script>
