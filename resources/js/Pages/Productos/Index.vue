<template>
    <AppLayout title="Productos">
        <div
            class="bg-white rounded-lg shadow-lg p-6 w-full max-w-2xl mx-auto mt-10"
        >
            <h1 class="text-2xl font-semibold mb-4 border-b pb-2">
                Lista de Productos
            </h1>

            <!-- Create Button -->
            <Link
                href="/productos/create"
                class="bg-green-500 text-white p-2 rounded hover:bg-green-600"
            >
                Create
            </Link>
            <div class="mt-4 space-y-4">
                <div
                    v-for="producto in productosAll"
                    :key="producto.id"
                    class="p-3 bg-gray-100 rounded hover:bg-gray-200 transition ease-in-out duration-150 flex justify-between items-center"
                >
                    <div>
                        <div class="font-bold">{{ producto.name }}</div>
                        <div class="text-sm text-gray-600">
                            {{ producto.description }}
                        </div>
                        <div class="text-sm text-gray-600">
                            <span class="font-bold">Precio:</span>
                            {{ producto.price }}
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <!-- Show Button -->
                        <Link
                            :href="`/productos/${producto.id}`"
                            class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600"
                        >
                            Ver
                        </Link>

                        <!-- Delete Button (Add confirmation before actual deletion for better UX) -->
                        <button
                            @click="deleteProduct(producto.id)"
                            class="bg-red-500 text-white p-2 rounded hover:bg-red-600"
                        >
                            Borrar
                        </button>
                    </div>
                </div>

                <div class="py-4 text-center">
                    <!--<breeze-pagination :links="votos.links" />-->
                    <button
                        v-if="props.productos.next_page_url"
                        class="bg-red-500 text-white p-2 rounded hover:bg-red-600"
                        @click="loadMore"
                    >
                        <span>Ver Mas</span>
                    </button>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { router, Link } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
    productos: [],
});

const productosAll = ref(props.productos.data);

const deleteProduct = (productId) => {
    if (confirm("Seguro/a que quieres eliminar este registro?")) {
        router.delete(`/productos/${productId}`);
    }
};

function loadMore() {
    if (props.productos.next_page_url == null) {
        return;
    }

    router.get(
        props.productos.next_page_url,
        {},
        {
            preserveState: true,
            preserveScroll: true,
            only: ["productos"],
            onSuccess: (page) => {
                productosAll.value = productosAll.value.concat(
                    page.props.productos.data
                );
            },
        }
    );
}
</script>
