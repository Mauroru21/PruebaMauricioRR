import { Component } from '@angular/core';
import { ProductService } from '../services/product.service';
import { ViewWillEnter } from '@ionic/angular';

@Component({
  selector: 'app-product-list',
  templateUrl: './product-list.page.html',
  styleUrls: ['./product-list.page.scss'],
})
export class ProductListPage implements ViewWillEnter {
  products: any[] = [];

  constructor(private productService: ProductService) {}

  ionViewWillEnter() {
    this.loadProducts();
  }

  async loadProducts() {
    this.products = await this.productService.getProducts();
  }

  async deleteProduct(productId: string) {
    await this.productService.deleteProduct(productId);
    this.loadProducts();
  }
}
