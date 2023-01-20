class Main {
  constructor() {
    this.element = document.querySelector('.main-menu')
    this.height = this.heightElement(this.element)
    this.events()
  }

  events() {
    this.homeBannerHeight(this.height)
  }

  // Methods
  heightElement(element) {
    return element.offsetHeight
  }

  homeBannerHeight(height) {
    const banner = document.querySelector('.home-banner')
    banner.style = `margin-top: -${height}px`
  }
}

// Export an instance of Main
export default Main
