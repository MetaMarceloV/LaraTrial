<template>
    <AppLayout title="Nuevo Producto">
        <div
            class="bg-white rounded-lg shadow-lg p-6 w-full max-w-2xl mx-auto mt-10"
        >
            <h1 class="text-2xl font-semibold mb-4 border-b pb-2">
                Nuevo Producto
            </h1>
            <form @submit.prevent="updateProduct">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700"
                            >Nombre</label
                        >
                        <input
                            v-model="form.name"
                            type="text"
                            required
                            class="mt-1 p-2 w-full border rounded-md"
                        />
                        {{ form }}
                        <div
                            v-if="form.errors.name"
                            class="text-red-500 text-sm"
                        >
                            {{ form.errors.name }}
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700"
                            >Descripción</label
                        >
                        <textarea
                            v-model="form.description"
                            required
                            class="mt-1 p-2 w-full border rounded-md"
                        ></textarea>
                        <div
                            v-if="form.errors.description"
                            class="text-red-500 text-sm"
                        >
                            {{ form.errors.description }}
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700"
                            >Precio</label
                        >
                        <input
                            v-model="form.price"
                            type="number"
                            step="0.01"
                            required
                            class="mt-1 p-2 w-full border rounded-md"
                        />
                        <div
                            v-if="form.errors.price"
                            class="text-red-500 text-sm"
                        >
                            {{ form.errors.price }}
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700"
                            >Categoría</label
                        >
                        <select
                            v-model="form.category_id"
                            required
                            class="mt-1 p-2 w-full border rounded-md"
                        >
                            <option
                                v-for="category in categorias"
                                :value="category.id"
                                :key="category.id"
                            >
                                {{ category.name }}
                            </option>
                        </select>
                    </div>
                    <div>
                        <button
                            type="submit"
                            class="mt-3 bg-green-500 text-white p-2 rounded hover:bg-green-600"
                        >
                            Actualizar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { ref, reactive } from "vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    producto: [],
    categorias: [],
});
const form = useForm({
    name: props.producto.name,
    id: props.producto.id,
    description: props.producto.description,
    price: props.producto.price,
    category_id: props.producto.category_id,
});

const updateProduct = () => {
    form.put(`/productos/${form.id}`, form);
};
</script>
