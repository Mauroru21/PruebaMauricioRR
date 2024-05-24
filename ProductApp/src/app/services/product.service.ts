import { Injectable } from '@angular/core';
import axios from 'axios';

@Injectable({
  providedIn: 'root',
})
export class ProductService {
  private apiUrl = 'http://localhost:3000/products'; // Asegúrate de tener una API configurada

  constructor() {}

  async getProducts() {
    const response = await axios.get(this.apiUrl);
    return response.data;
  }

  async addProduct(product: any) {
    const response = await axios.post(this.apiUrl, product);
    return response.data;
  }

  async deleteProduct(productId: string) {
    const response = await axios.delete(`${this.apiUrl}/${productId}`);
    return response.data;
  }
}
