// resources/js/cart.js
import { db, auth } from "./firebase-init.js";
import { doc, getDoc, setDoc, updateDoc } from "firebase/firestore";

export async function addToCart(product) {
  const user = auth.currentUser;
  if (!user) {
    alert("Silakan login dulu");
    return;
  }

  const itemRef = doc(db, "carts", user.uid, "items", product.id);
  const itemSnap = await getDoc(itemRef);

  if (itemSnap.exists()) {
    await updateDoc(itemRef, { qty: itemSnap.data().qty + 1 });
  } else {
    await setDoc(itemRef, {
      name: product.name,
      price: product.price,
      image: product.image,
      qty: 1
    });
  }

  alert("Berhasil ditambahkan ke keranjang!");
}

// biar bisa dipanggil dari onclick di Blade
window.addToCart = addToCart;