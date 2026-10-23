<dl
    x-data="{
        lightbox: null,
        observer: null,

        init() {
            this.$el.dataset.lightboxId = 'lightbox-' + Math.random().toString(36).slice(2)

            this.lightbox = GLightbox({
                ...@js(config('filament-lightbox')),
                selector: `[data-lightbox-id='${this.$el.dataset.lightboxId}'] .glightbox`,
            })

            this.observer = new MutationObserver(() => {
                this.lightbox.baseEvents?.destroy()
                this.lightbox.reload()
            })

            this.observer.observe(this.$el, { childList: true, subtree: true })
        },

        destroy() {
            this.observer?.disconnect()
            this.lightbox?.destroy()
            this.lightbox = null
        },
    }"
>
    <div class="flex flex-wrap gap-1.5">
        @foreach ($getComponents() as $infolistComponent)
            {{ $infolistComponent }}
        @endforeach
    </div>
</dl>
