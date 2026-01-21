<nav class="fixed w-full z-40 bg-white/80 backdrop-blur-md border-b border-border transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
            <div class="flex-shrink-0 flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-primary flex items-center justify-center text-white font-bold text-xl">
                    C
                </div>
                <span class="font-bold text-2xl tracking-tighter text-text">{{ config('app.name') }}</span>
            </div>
            
            <!-- Desktop Menu (Guest Only) -->
                <div class="md:flex space-x-8 items-center">
                    <a href="#features" class="text-secondary hover:text-primary font-medium transition-colors">Features</a>
                    <a href="#pricing" class="text-secondary hover:text-primary font-medium transition-colors">Pricing</a>
                    <a href="#testimonials" class="text-secondary hover:text-primary font-medium transition-colors">Testimonials</a>
                    <a href="#" class="px-5 py-2.5 rounded-full bg-text text-white font-medium hover:bg-opacity-90 transition-all transform hover:-translate-y-0.5 hover:shadow-lg">Get Started</a>
                </div>
        </div>
    </div>
</nav>
