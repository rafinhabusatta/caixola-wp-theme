class Main {
  constructor() {
    // this.element = document.getElementsByTagName('header')
    // this.height = this.heightElement(element)
    this.events()
  }

  events() {
    // this.homeBannerHeight(height)
    console.log('Main class loaded')
  }

  // Methods
  heightElement(element) {
    return element.offseHeight
  }

  homeBannerHeight(height) {
    const banner = document.querySelector('home-banner')
    banner.style = `margin-top: -${height}px`
  }
}

// Export an instance of Main
export default Main
