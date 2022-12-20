#!/usr/bin/python3
import os
import math
import json
import pathlib
import shutil
import pandas

FILE_DIR = pathlib.Path(os.path.dirname(os.path.realpath(__file__)))
ROOT_DIR = FILE_DIR / '..'
POSTS_DIR = ROOT_DIR / 'content'
DATA_PATH = ROOT_DIR / 'posts.csv'

def write_file(target, content):
    pathlib.Path(os.path.dirname(target)).mkdir(parents=True, exist_ok=True)

    with open(target, mode='w', encoding='UTF-8', errors='strict') as f:
        f.write(content)

def get_filename(post_date):
    return post_date.split(' ')[0]

def write_attr(row, col):
    value = row[col]
    if value is None:
        return ''
    if type(value) is str:
        value = json.dumps(value)
    if col == 'post_date':
        col = 'date'
    if col == 'post_title':
        col = 'title'
    return f'{col}: {value}'

def write_post_content(row):
    # post_title = row['post_title']
    # post_date = row['post_date']
    return '\n'.join([
        # '',
        # f'# {post_title}',
        # '',
        # f' {post_date}',
        '',
        write_image(row),
        '',
    ])

def write_image(row):
    title = row['post_content_title']
    src = row['post_content_src']
    src = f'/comics-hi-res/{src}'
    return f'[![{title}]({src})]({src})'

def write_post(row, columns):
    attrs = [write_attr(row, col) for col in columns]
    attrs = '\n'.join([a for a in attrs if a])
    content = '\n'.join([
        '---',
        attrs,
        '---',
        '',
        write_post_content(row),
    ])

    target = POSTS_DIR / f'{get_filename(row["post_date"])}.md'
    write_file(target, content)

def read_data():
    df = pandas.read_csv(DATA_PATH, index_col = 0)
    df = df.fillna('')
    return df

def write_all_comics():
    df = read_data()
    for idx in range(len(df)):
        row = df.loc[idx]
        write_post(row, df.columns)

def main():
    try:
        shutil.rmtree(POSTS_DIR)
    except:
        pass
    POSTS_DIR.mkdir(parents=True, exist_ok=True)
    write_all_comics()

if __name__ == "__main__":
    main()
