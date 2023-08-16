<script setup></script>

<template>
    <div>
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
            <h1 class="mt-8 text-2xl font-medium text-blue-900">
                ¡Bienvenido/a a la aplicación de prueba!
            </h1>

            <p class="mt-6 text-gray-500 leading-relaxed">
                Esta es una plataforma diseñada para demostrar habilidades en
                Laravel y Jetstream. Aquí podrás administrar productos y
                categorías de manera eficiente y efectiva.
            </p>
        </div>

        <div
            class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8"
        >
            <!-- Sección para administrar productos -->
            <div>
                <div class="flex items-center">
                    <!-- Puedes cambiar el ícono por uno que represente productos -->
                    <h2 class="ml-3 text-xl font-semibold text-yellow-900">
                        <a href="{{ route('products.index') }}">Productos</a>
                    </h2>
                </div>
                <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                    Administra, crea, actualiza o elimina productos.
                </p>
            </div>

            <!-- Sección para administrar categorías -->
            <div>
                <div class="flex items-center">
                    <!-- Puedes cambiar el ícono por uno que represente categorías -->
                    <h2 class="ml-3 text-xl font-semibold text-yellow-900">
                        <a href="{{ route('categories.index') }}">Categorías</a>
                    </h2>
                </div>
                <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                    Administra las categorías de tus productos.
                </p>
            </div>
        </div>
    </div>
</template>
