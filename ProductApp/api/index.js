const express = require("express");
const mongoose = require("mongoose");
const cors = require("cors");

const app = express();
app.use(cors());
app.use(express.json());

const mongoURI = "mongodb://127.0.0.1:27017/dbPrueba";

mongoose
  .connect(mongoURI, {})
  .then(() => {
    console.log("Conectado a MongoDB");
    app.listen(3000, () => {
      console.log("Servidor corriendo en puerto 3000");
    });
  })
  .catch((err) => {
    console.error("No se pudo conectar a MongoDB", err);
  });

const productSchema = new mongoose.Schema({
  nombre: String,
  precio: Number,
  cantidad: Number,
});

const Product = mongoose.model("productos", productSchema);

app.get("/products", async (req, res) => {
  try {
    const products = await Product.find();
    console.log("products:", products);
    res.send(products);
  } catch (err) {
    console.error("Error al obtener productos:", err);
    res.status(500).send(err);
  }
});

app.post("/products", async (req, res) => {
  try {
    console.log("req.body:", req.body);
    const product = new Product(req.body);
    await product.save();
    res.send(product);
  } catch (err) {
    console.error("Error al agregar producto:", err);
    res.status(500).send(err);
  }
});

app.delete("/products/:id", async (req, res) => {
  try {
    await Product.findByIdAndDelete(req.params.id);
    res.send({ message: "Product deleted" });
  } catch (err) {
    console.error("Error al eliminar producto:", err);
    res.status(500).send(err);
  }
});
