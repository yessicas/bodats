=====================================
STATUS : DONE
Modifikasi bagian standard agency item.
Contoh url : http://localhost/erppm/standardagencyitem/viewdetail/id/10

Notes: fielnya agak diubah yaitu menambahkan field unit_price, type (FIX, VARIABLE), quantity, metric.
Field yang lama agency_fix_cost, agency_var_cost masih ada tetapi tidak dihapus. Sebenarnya tidak dipakai lagi field ini.

1) tambahkan field TOTAL di paling kiri yang merupakan perkalian dari quantity x amount ::: DONE
2) Total yang sekarang agak berbeda karena akan ada 3 total : - total FIX, total VARIABLE sama total semua.:::DONE
Usul : mungkin bisa pakai display text biasa di paling bawah
3) Paging sepertinya tidak perlu ditampilkan untuk memberikan gambaran lengkap ke user tentang detail item Agency :: DONE
4) Perubahan field tersebut akan mengubah mekanisme untuk add detail item serta edit/updatenya dengan modifikasi field-field baru tersebut. ::: DONE

=====================================

=================================
STATUS : DONE
Untuk approval PR juga sedikit dimodifikasi sesuai hasil rapat.
Ada tambahan yang belum ditambahkan yaitu:
Pada bagian manage PR Approval (http://localhost/erppml/purchaserequest/adminapproval):
- Tambahkan satu field lagi setelah PR Date dengan judul Lead Time (Atau bahasa sehari-hari keterlambatan).
Ini merupakan perhitungan antara hari sekarang dikurangi dengan PR Date.
Jadi sementara pewarnaannya dibuat spt ini :
1 hari --> Warna kuning
2-3 hari --> Warna oranye
> 3 hari --> Warna merah
================================


=================================
catatan error data create po category 10400  
pada menu http://localhost/erppm/purchaseorder/managepritem
- saat memilih create po per satuan ga bermasalah ( http://localhost/erppm/purchaseorder/createpomultiplepr/scid/38 )
- tapi saat create po dua atau lebih  sekaligus melalui  pilihan ceklist dan button create Po from multi PR ( http://localhost/erppm/purchaseorder/createpomultipleitem ) 
  data id_purchase_request dan id_purchase_request_detail sama valuenya setelah masuk database.
- setelah di track masalah ini berasal dari controler  purchaseorder action createpomultipleitem 
  dan beruhung pada component PurchaseOrderDB method savePurchaseOrderItemModeSelectItem
==================================