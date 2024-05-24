import { Component } from '@angular/core';
import { ProductService } from '../services/product.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-add-product',
  templateUrl: './add-product.page.html',
  styleUrls: ['./add-product.page.scss'],
})
export class AddProductPage {
  product = {
    nombre: '',
    precio: 0,
    cantidad: 0,
  };

  constructor(private productService: ProductService, private router: Router) {}

  async addProduct() {
    if (
      !this.product.nombre ||
      this.product.precio <= 0 ||
      this.product.cantidad <= 0
    ) {
      return;
    }
    await this.productService.addProduct(this.product);
    this.router.navigate(['/product-list']);
  }
}
