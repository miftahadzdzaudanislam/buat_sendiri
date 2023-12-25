class youtube:
    def __init__(self, nama, umur, subs):
        self.nama = nama
        self.umur = umur
        self.subs = subs

    def cetak(self):
        print(f'Konten kreator\t: {self.nama}\nUmur\t\t: {self.umur}\nSubscriber\t: {self.subs}')

al = youtube('Alfachri', 21, 600000)
al.cetak()

class streamer(youtube):
    def __init__(self, nama, umur, subs, konten, fans):
        super().__init__(nama, umur, subs)
        self.konten = konten
        self.fans = fans

    def cetak(self):
        super().cetak()
        print(f'konten\t\t: {self.konten}\nNama Fans\t: {self.fans}')

ray = streamer('Ray Restu', 28, 150000, 'Meme', 'AME:ID')
ray.cetak()

class vtuber(youtube):
    def __init__(self, nama, umur, subs):
        super().__init__(nama, umur, subs)