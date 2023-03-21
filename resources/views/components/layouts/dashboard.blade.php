<x-layouts.app>
    <div class="wrapper">
        <x-navigation.sidebar />
        <div class="main">
            <x-navigation.navbar />
            <main class="content">
                {{$slot}}
            </main>
            <x-navigation.footer />
        </div>
    </div>
</x-layouts.app>